<?php
/**
 * This file contains class::LapsComputed
 * @package Runalyze\View\Activity\Plot
 */

namespace Runalyze\View\Activity\Plot;

use Runalyze\Model\Trackdata;
use Runalyze\View\Activity;

/**
 * Plot for: computed laps
 * 
 * @author Hannes Christiansen
 * @package Runalyze\View\Activity\Plot
 */
class LapsComputed extends Laps {
	/**
	 * Demanded pace in s/km
	 * @var int
	 */
	protected $demandedPace = 0;

	/**
	 * Achieved pace in s/km
	 * @var int
	 */
	protected $achievedPace = 0;

	/**
	 * Set key and title for this plot
	 */
	protected function setKey() {
		$this->key = 'laps_computed';
		$this->title = __('Computed Laps');
	}

	/**
	 * Load data
	 * @param \Runalyze\View\Activity\Context $context
	 */
	protected function loadData(Activity\Context $context) {
		if (!$context->trackdata()->has(Trackdata\Object::DISTANCE) || !$context->trackdata()->has(Trackdata\Object::TIME)) {
			$this->Plot->raiseError( __('No GPS-data available. Can\\\'t compute laps.') );
			return;
		}

		$RawData = $this->computeRounds($context);
		$num = count($RawData);

		foreach ($RawData as $key => $val) {
			$km = $key + 1;
			if ($num < 20) {
				$label = ($km%2 == 0 && $km > 0) ? $km.' km' : '';
			} elseif ($num < 50) {
				$label = ($km%5 == 0 && $km > 0) ? $km.' km' : '';
			} elseif ($num < 100) {
				$label = ($km%10 == 0 && $km > 0) ? $km.' km' : '';
			} else {
				$label = ($km%50 == 0 && $km > 0) ? $km.' km' : '';
			}

			$this->Labels[$key] = array($key, $label);
			$this->Data[$key]   = $val['km'] > 0 ? $val['s']*1000/$val['km'] : 0;
		}

		$this->Plot->Data[] = array('label' => $this->title, 'data' => $this->Data);
	}

	/**
	 * @param \Runalyze\View\Activity\Context $context
	 * @return array
	 */
	protected function computeRounds(Activity\Context $context) {
		$Loop = new Trackdata\Loop($context->trackdata());
		$Rounds = array();

		do {
			$Loop->nextKilometer();

			$Rounds[] = array(
				'km' => $Loop->difference(Trackdata\Object::DISTANCE),
				's' => $Loop->difference(Trackdata\Object::TIME)
			);
		} while (!$Loop->isAtEnd());

		return $Rounds;
	}
}