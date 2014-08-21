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

class SpecialGlobalConfigWiki extends SpecialPage {
	function __construct() {
		parent::__construct( 'GlobalConfigWiki' );
	}

	function userCanEdit() {
		return $this->getUser()->isAllowed( 'configwiki-global' );
	}

	function execute( $par ) {
		$this->setHeaders();

		$this->getOutput()->setPageTitle( $this->msg( 'globalconfigwiki' ) );
	}
}

