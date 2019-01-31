<?php
/**
 * User: DesleyRoelofsen
 * Date: 20-09-18
 * Time: 16:00
 */

namespace App\Support;

use \ArrayAccess;

/**
 * Class Arr
 * @package App\Support
 */
class Arr
{

	/**
	 * @param array $array
	 * @param array|string|int $keys
	 *
	 * @return bool
	 */
	public static function has(array $array, $keys) : bool
	{
		if(is_null($key)){
			return false;
		}

		$keys = (array) $keys;

		if(!is_array($array) && empty($array)){
			return false;
		}

		if($keys === []){
			return false;
		}
	}


	/**
	 * @param array $array
	 * @param string $key
	 * @param mixed $value
	 * @return array
	 */
	public static function set(&$array, $key, $value)
	{
		if(is_null($key)){
			return $array = $value;
		}

		$keys = explode('.', $key);

		while (count($keys) > 1){
			$key = array_shift($keys);

			if(! isset($array[$key]) || ! is_array($array[$key])){
				$array[$key] = [];
			}

			$array = &$array[$key];
		}


		$array[array_shift($keys)] = $value;

		return $array;
	}

	/**
	 *
	 */
	public static function get()
	{

	}

	/**
	 *
	 */
	public static function add()
	{

	}

	/**
	 * Check if the given value is accessible.
	 *
	 * @param  \ArrayAccess|array $value
	 * @return bool
	 */
	public static function isAccessible($value) : bool
	{
		return is_array($value) || $value instanceof ArrayAccess;
	}

	/**
	 * Check if a array is a Associative array. (a Associative array is an array that doesn't have numeric array keys)
	 *
	 * @param array $array
	 * @return bool
	 */
	public static function isAssociative(array $array) : bool
	{
		$keys = array_keys($array);

		return array_keys($keys) !== $keys;
	}

	/**
	 * Check if the given key exists in the given array.
	 * And if the given array is a instanceof \ArrayAccess, than use the offsetExists method.
	 *
	 * @param \ArrayAccess|array $array
	 * @param string|int $key
	 * @return bool
	 */
	public static function exists($array, $key)
	{
		if($array instanceof ArrayAccess){
			return $array->offsetExists($key);
		}

		return array_key_exists($key, $array);
	}

	/**
	 * Devide the array into two arrays, one with the array keys and one with the array values.
	 *
	 * @param array $array
	 * @return array
	 *
	 */
	public static function devide(array $array)
	{
		return [array_keys($array), array_values($array)];
	}
}