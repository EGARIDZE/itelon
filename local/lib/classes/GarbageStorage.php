<?php


class GarbageStorage
{
	private static $storage = array();
	public static function set($name, $value){ self::$storage[$name] = $value;}
	public static function get($name){ return self::$storage[$name];}
	public static function has($name){ return isset(self::$storage[$name]);}
	public static function delete($name){ unset(self::$storage[$name]);}
	public static function getAll(){ return self::$storage; }
}