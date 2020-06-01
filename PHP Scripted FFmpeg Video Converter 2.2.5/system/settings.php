<?php


	// ENCODING
	// Set the encoding used on the system where the script runs.
	// If any of the files placed in the "in" directory contains special or local characters, then you have to set the correct encoding used on the system.
	define('ENCODING', 'utf-8'); // Universal Alphabet.
	// define('ENCODING', 'iso-8859-1'); // Western Alphabet.
	// define('ENCODING', 'iso-8859-2'); // Central European Alphabet.
	// define('ENCODING', 'iso-8859-3'); // Latin 3 Alphabet.
	// define('ENCODING', 'iso-8859-4'); // Baltic Alphabet.
	// define('ENCODING', 'iso-8859-5'); // Cyrillic Alphabet.
	// define('ENCODING', 'iso-8859-6'); // Arabic Alphabet.
	// define('ENCODING', 'iso-8859-7'); // Greek Alphabet.
	// define('ENCODING', 'iso-8859-8'); // Hebrew Alphabet.
	// define('ENCODING', 'shift-jis'); // Japanese.
	// define('ENCODING', 'big5'); // Chinese Traditional.


	// WRITE_LOG
	// Set whether or not to have the script write a log.
	// Set to true to have the script write a log.
	// Set to false to have the script not write a log.
	// define('WRITE_LOG', false);
	define('WRITE_LOG', true);


	// CLEAR_LOG_FILE
	// Set whether or not to have the script clear the log each time the script is started.
	// Set to true to cleared log file at each start of the script.
	// Set to false to keep the current log and append to the end.
	// define('CLEAR_LOG_FILE', false);
	define('CLEAR_LOG_FILE', true);


	// LOG_FILE
	// Set filepath for logfile. Use a relative path like './logfile', or an absolute like this: 'c:/convert/logfile.txt'.
	// Make sure to use / (slash) and not \ (back-slash) in the path.
	define('LOG_FILE', './logfile.txt');


?>