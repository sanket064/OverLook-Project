<?php

Class Dictionary{
	public static function get($labelName, $lan)
	{
		$arrlabels = array(
			"en"=>
				array(
					"featuredTitle"=>"Featured"
				),
				"fr"=>
					array(
						"featuredTitle"=>"Especsial"
					)
					
				);

		return $arrlabels[$lan][$labelName];
	}
}