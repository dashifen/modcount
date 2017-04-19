<?php

namespace Dashifen\Modcount;

/**
 * Class Modcount
 *
 * @package Dashifen\Modcount
 */
class Modcount implements ModcountInterface {
	/**
	 * @var int $mod
	 */
	protected $mod;
	
	/**
	 * @var int $counter
	 */
	protected $counter;
	
	/**
	 * Modcount constructor.
	 *
	 * @param int $mod
	 */
	public function __construct(int $mod) {
		$this->set($mod);
	}
	
	/**
	 * Allows for a callable instance for sometimes cleaner code
	 *
	 * @return int;
	 */
	public function __invoke(): int {
		return $this->count();
	}

	/**
	 * @param int $mod
	 *
	 * @throws ModcountException
	 * @return void
	 */
	public function set(int $mod): void {
		if ($mod <= 0) {
			throw new ModcountException("Counting requires positive integer.");
		}
		
		$this->mod = $mod;
		$this->reset();
	}
	
	/**
	 * produces a sequence of numbers over subsequent calls from 0
	 * to $this->mod and then 1 again.  e.g., for $mod = 3, calls to
	 * count() result in 0, 1, 2, 0, 1, 2, 0, 1, 2, 0, 1, ...
	 *
	 * @throws ModcountException
	 * @return int
	 */
	public function count(): int {
		if (!is_numeric($this->mod)) {
			throw new ModcountException("Counting requires positive integer.");
		}
		
		// here we want to increment our counter and then mod it by
		// the $mod property to produce our sequence.  we then remember
		// what we just produces so that we can increment it again next
		// time.
		
		return ($this->counter = ++$this->counter % $this->mod);
	}
	
	/**
	 * restarts the sequence from 0
	 *
	 * @return void
	 */
	public function reset(): void {
		
		// the first call to count will increment our counter
		// from -1 to 0.  if we set counter to zero, we'd start
		// from 1.
		
		$this->counter = -1;
	}
	
}
