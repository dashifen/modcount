<?php

namespace Dashifen\Modcount;

interface ModcountInterface {
	/**
	 * @param int $mod
	 *
	 * @throws ModcountException
	 * @return void
	 */
	public function set(int $mod): void;
	
	/**
	 * produces a sequence of numbers over subsequent calls from 1
	 * to $this->mod and then 1 again.  e.g., for $mod = 3, calls to
	 * count() result in 1, 2, 3, 1, 2, 3, 1, 2, 3, 1, ...
	 *
	 * @throws ModcountException
	 * @return int
	 */
	public function count(): int;
	
	/**
	 * restarts the sequence from 1
	 *
	 * @return void
	 */
	public function reset(): void;
}
