<?php

namespace Ukrposhta\Directory;

use Ukrposhta\Data\Storage;
use Ukrposhta\Directory;

class Postoffice extends Directory
{
	const REQUEST_URL_GET_POSTOFFICE = 'get_postoffices_by_postindex';
	const REQUEST_URL_GET_POSTOFFICE_OPEN_HOURS = 'get_postoffices_openhours_by_postindex';

	public function getByPostIndex(int $postIndex, Storage $params = null)
	{
		if ($params === null) {
			$params = new Storage();
		}

		$url = $this->getUrl(function (string $url) {
			return $url . '/' . self::REQUEST_URL_GET_POSTOFFICE;
		});
		$params->pi = $postIndex;

		return $this->send($url, $params);
	}

	public function getOpenHoursByPostIndex(int $postIndex, Storage $params = null)
	{
		if ($params === null) {
			$params = new Storage();
		}

		$url = $this->getUrl(function (string $url) {
			return $url . '/' . self::REQUEST_URL_GET_POSTOFFICE_OPEN_HOURS;
		});
		$params->pi = $postIndex;

		return $this->send($url, $params);
	}
}