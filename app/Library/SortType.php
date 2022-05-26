<?php namespace App\Library {

    use Illuminate\Support\Collection;

    class SortType extends \SplEnum
    {
        const __default = self::Newest;

        const Newest = 0;
        const Oldest = 1;
        const Cheapest = 2;
        const Expest = 3;

        public static function GetName($key): string
        {
            $names = array(
                self::Newest => 'Newest',
                self::Oldest => 'Oldest',
                self::Cheapest => 'Price low to high',
                self::Expest => 'Price high to low'
            );
            return $names[$key];
        }

        public static function toCollection(): Collection
        {
            $items = (new SortType)->getConstList();
            $sortItems = new Collection();
            foreach ($items as $item) {
                $sortItems->push((object)['id' => $item,
                    'name' => SortType::GetName($item)
                ]);

            }
            return $sortItems;
        }
    }


}
