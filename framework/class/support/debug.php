<?php
/**
 * Contains definition of Debug class
 *
 * @author Lindsay Marshall <lindsay.marshall@ncl.ac.uk>
 * @copyright 2014-2015 Newcastle University
 */
/**
 * A class that handles various debugging related things
 */
    class Debug
    {
/**
 * @var Resource    The file descriptor
 */
	private static $fd = NULL;
/**
 * Set up the file
 */
	private static function setup()
	{
	    if (self::$fd === NULL)
	    {
	        ##self::$fd = fopen('/tmp/'.Config::SITENAME.'debug.txt', 'a');
			self::$fd = fopen(Config::SITENAME.'debug', 'w');
	    }
	}
/**
 * Display a string
 *
 * @param string    $str
 *
 * @todo use the new ... stuff in PHP 5.6 to allow many parameters
 */
	public static function show($str)
	{
	    self::setup();
	    fputs(self::$fd, $str."\n");
	}
/**
 * Dump a variable - uses buffering to grab the output.
 *
 * @param mixed    $var
 *
 * @todo use the new ... stuff in PHP 5.6 to allow many parameters
 */
	public static function vdump($var)
	{
	    self::setup();
	    ob_start();
	    var_dump($var);
	    fputs(self::$fd, ob_get_clean());
	}
/**
 * Flush the output stream
 *
 * @return void
 */
        public static function flush()
        {
	    if (self::$fd !== NULL)
	    {
	        fflush($fd);
	    }
        }
    }
?>
