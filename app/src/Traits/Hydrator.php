<?php

namespace App\Traits;

trait Hydrator
{
    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
			// Tester les deux prochaines lignes dès que possible
			$keySplitAroundUnderscores = explode('_',$key);
			$key = $keySplitAroundUnderscores[0] . ucfirst($keySplitAroundUnderscores[1]);
			
            $method = 'set' . ucfirst($key);
            if (is_callable([$this, $method])) {
                $this->$method($value);
            }
        }
    }
}
