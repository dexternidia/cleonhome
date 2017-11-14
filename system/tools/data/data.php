<?php
namespace System\tools\method;

use System\tools\session\Message;

class Data {

	public static function method($data)
	{
		return extract($data);
	}
}