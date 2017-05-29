<?php
/**
 * Created by PhpStorm.
 * User: michaelhopkins
 * Date: 5/29/17
 * Time: 7:26 AM
 */

namespace Forum\Filters;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use function method_exists;

abstract class Filters {

	protected $filters = [];
	/**
	 * @var Request
	 */
	protected $request;
	/**
	 * @var Builder
	 */
	protected $builder;

	/**
	 * ThreadFilters constructor.
	 *
	 * @param Request $request
	 */
	public function __construct( Request $request ) {
		$this->request = $request;
	}

	public function apply( $builder ) {

		$this->builder = $builder;

		foreach ( $this->getFilters() as $filter => $value ) {
			if ( method_exists( $this, $filter ) ) {
				$this->$filter( $value );
			}
		}

		return $this->builder;
	}

	public function getFilters() {
		return $this->request->intersect( $this->filters );
	}
}