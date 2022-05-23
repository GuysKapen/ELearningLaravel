<?php namespace App\Library {

    use Illuminate\Support\Collection;

    class DurationType extends \SplEnum
    {
        const __default = self::Sec;

        const Sec = 0;
        const Min = 1;
        const Hour = 2;

        public static function GetName($key): string
        {
            $names = array(
                self::Sec => 'Sec',
                self::Min => 'Min',
                self::Hour => 'Hour'
            );
            return $names[$key];
        }

        public static function toCollection(): Collection
        {
            $items = (new DurationType)->getConstList();
            $timeUnits = new Collection();
            foreach ($items as $item) {
                $timeUnits->push((object)['id' => $item,
                    'name' => DurationType::GetName($item)
                ]);

            }
            return $timeUnits;
        }
    }


}
