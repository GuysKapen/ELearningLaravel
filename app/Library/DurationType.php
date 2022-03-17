<?php namespace App\Library {

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
    }


}
