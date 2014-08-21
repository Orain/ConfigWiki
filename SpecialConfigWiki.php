<?php
/**
 * Copyright (C) 2013 Orain, Kudu and contributors
 *
 * This file is part of ConfigWiki.
 *
 * ConfigWiki is free software: you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License as published by the Free
 * Software Foundation, either version 3 of the License, or (at your option)
 * any later version.
 *
 * ConfigWiki is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License
 * for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with ConfigWiki.  If not, see <http://www.gnu.org/licenses/>.
 */

class SpecialConfigWiki extends SpecialPage {
	function __construct() {
		parent::__construct( 'ConfigWiki' );
	}

	function userCanEdit() {
		return $this->getUser()->isAllowed( 'configwiki' );
	}

	function userCanEditProtected() {
		return $this->getUser()->isAllowedAll( 'configwiki', 'configwiki-editprotected' );
	}

	function execute( $par ) {
		$this->setHeaders();
		$this->getOutput()->setPageTitle( $this->msg( 'configwiki' ) );

		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select(
			array( 'g' => 'globalconfigwiki', 'l' => 'configwiki' ), // Aliases => tables
			array( 'name', 'description', 'locked', 'default_value', 'local_value' ), // Fields
			array( 'locked != TRUE'), // Condition
			__METHOD__,
			array(),
			array( // Left outer join on configwiki
				array( 'l' => array(
					'LEFT OUTER JOIN',
					array('g.name=l.name'),
				)
			),
		);

		$formDescriptor = array();
		foreach ( $res as $row ) {
			$formDescriptor[$row->name . '-desc'] = array(
				'section' => $row->name,
				'type' => 'info',
				'label' => '',
				'default' => $row->description,
			);

			$formDescriptor[$row->name . '-custom'] = array(
				'section' => $row->name,
				'type' => 'text',
				'label' => 'Custom value',
				'default' => $row->local_value,
			);
		}

		$htmlForm = new HTMLForm( $formDescriptor, $this->getContext() );
		$htmlForm->setSubmitText( 'Submit' );
		$htmlForm->show();
	}
}
