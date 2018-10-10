<?php

namespace Shopeca\NameSplitter;

class Splitter
{

	private $data = null;
	private $dataFile = 'database/firstNames.php';

	public function __construct()
	{
		$this->loadData();
	}

	public function splitName($fullName)
	{
		$firstName = [];
		$surname = [];
		if (is_string($fullName) && $fullName != '') {
			$parts = explode(" ", trim($fullName));
			if (count($parts) > 0) {
				foreach ($parts as $part) {
					if ($this->isFirstName($part)) {
						$firstName[] = $part;
					} else {
						$surname[] = $part;
					}
				}
			}
			if (count($surname) == 0 && count($parts) > 1) {
				$lastKey = count($parts) - 1;
				$firstName = [];
				foreach ($parts as $k => $part) {
					if ($k == $lastKey) {
						$surname[] = $part;
					} else {
						$firstName[] = $part;
					}
				}
			}
		}
		return [
			'firstName' => implode(' ', $firstName),
			'surname' => implode(' ', $surname),
		];
	}

	public function isFirstName($name)
	{
		return
			is_array($this->data) &&
			count($this->data) > 0 &&
			in_array(mb_strtoupper($name, 'utf-8'), $this->data);
	}

	private function loadData()
	{
		$file = __DIR__.'/'.$this->dataFile;
		if (file_exists($file)) {
			$this->data = include($file);
		}
	}

}
