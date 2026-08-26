<?php

if ( ! function_exists('load_environment'))
{
	/**
	 * Load KEY=VALUE entries from a .env file without overriding server values.
	 */
	function load_environment($path)
	{
		if ( ! is_file($path) || ! is_readable($path))
		{
			return;
		}

		$lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		foreach ($lines as $line)
		{
			$line = trim($line);
			if ($line === '' || $line[0] === '#')
			{
				continue;
			}

			if (strpos($line, 'export ') === 0)
			{
				$line = trim(substr($line, 7));
			}

			$separator = strpos($line, '=');
			if ($separator === FALSE)
			{
				continue;
			}

			$key = trim(substr($line, 0, $separator));
			if ( ! preg_match('/^[A-Z_][A-Z0-9_]*$/i', $key) || getenv($key) !== FALSE)
			{
				continue;
			}

			$value = trim(substr($line, $separator + 1));
			if (strlen($value) >= 2 && (($value[0] === '"' && substr($value, -1) === '"') || ($value[0] === "'" && substr($value, -1) === "'")))
			{
				$quote = $value[0];
				$value = substr($value, 1, -1);
				if ($quote === '"')
				{
					$value = stripcslashes($value);
				}
			}
			else
			{
				$value = preg_replace('/\s+#.*$/', '', $value);
			}

			putenv($key.'='.$value);
			$_ENV[$key] = $value;
			$_SERVER[$key] = $value;
		}
	}
}
