<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2013 Bastian Bräu (bb@bftmedia.de)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*  A copy is found in the textfile GPL.txt and important notices to the license
*  from the author is found in LICENSE.txt distributed with these scripts.
*
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

namespace B263\Fs2\Utility;

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class SliderContentObjectRenderer {

	/**
	 * @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer
	 */
	protected $cObjectRenderer;

	/**
	 * @param \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer $cObjectRenderer
	 */
	public function __construct(ContentObjectRenderer $cObjectRenderer) {
		$this->cObjectRenderer = $cObjectRenderer;
	}

	/**
	 * @return string
	 */
	public function renderElementsFromPages() {
		$conf = array(
			'table' => 'tt_content',
			'select.' => array(
				'pidInList' => $this->cObjectRenderer->data['pages'],
				'where' => sprintf('(sys_language_uid="-1" OR sys_language_uid="%s")', $this->cObjectRenderer->data['sys_language_uid']),
				'andWhere' => 'CType!="fs2_pi1"', // prevents recursion
				'orderBy' => 'sorting',
			),
			'renderObj.' => array(
				'stdWrap.' => array(
					'wrap' => '<li> | </li>',
				),
			),
		);
		return $this->cObjectRenderer->CONTENT($conf);
	}

	/**
	 * @return string
	 */
	public function renderSingleElements() {
		$conf = array(
			'tables' => 'tt_content',
			'source' => $this->cObjectRenderer->data['records'],
			'conf.' => array(
				'tt_content.' => array(
					'stdWrap.' => array(
						'outerWrap' => '<li> | </li>', //TODO make wrap configurable
					),
				),
			),
		);
		return $this->cObjectRenderer->RECORDS($conf);
	}

	/**
	 * @return string
	 */
	public function renderAll() {
		return $this->renderElementsFromPages() . $this->renderSingleElements();
	}

}