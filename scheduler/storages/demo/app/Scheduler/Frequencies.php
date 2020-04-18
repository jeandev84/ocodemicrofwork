<?php
namespace App\Scheduler;


/**
 * Trait Frequencies
 * @package App\Scheduler
*/
trait Frequencies
{

    /**
     * @param $expression
     * @return $this
    */
    public function cron($expression)
    {
        $this->expression = $expression;

        return $this;
    }

    /**
     * @return Frequencies
    */
    public function everyMinute()
    {
        return $this->cron($this->expression);
    }

    /**
     * @return Frequencies
    */
    public function everyTenMinutes()
    {
        return $this->replaceIntoExpression(1, '*/10');
    }

    /**
     * @return Frequencies
    */
    public function everyThirtyMinutes()
    {
        return $this->replaceIntoExpression(1, '*/30');
    }

    /**
     * @param int $minute
     * @return Frequencies
    */
    public function hourlyAt($minute = 1)
    {
        return $this->replaceIntoExpression(1, $minute);
    }


    /**
     * @return Frequencies
    */
    public function hourly()
    {
        return $this->hourlyAt(1);
    }


    /**
     * @param int $hour
     * @param int $minute
     * @return Frequencies
   */
    public function dailyAt($hour = 0, $minute = 0)
    {
        return $this->replaceIntoExpression(1, [$minute, $hour]);
    }

    /**
     * @return Frequencies
    */
    public function daily()
    {
        return $this->dailyAt(0, 0);
    }


    /**
     * @param int $firstHour
     * @param int $lastHour
     * @return Frequencies
    */
    public function twiceDaily($firstHour = 1, $lastHour = 12)
    {
        return $this->replaceIntoExpression(1, [0, "{$firstHour},{$lastHour}"]);
    }


    /**
     * @return Frequencies
    */
    public function days()
    {
        return $this->replaceIntoExpression(5, implode(',', func_get_args() ?: ['*']));
    }

    /**
     * @return Frequencies
    */
    public function mondays()
    {
        return $this->days(1);
    }

    /**
     * @return Frequencies
    */
    public function tuesdays()
    {
        return $this->days(2);
    }


    /**
     * @return Frequencies
    */
    public function wednesdays()
    {
        return $this->days(3);
    }


    /**
     * @return Frequencies
    */
    public function thursdays()
    {
        return $this->days(4);
    }


    /**
     * @return Frequencies
    */
    public function fridays()
    {
        return $this->days(5);
    }


    /**
     * @return Frequencies
    */
    public function saturdays()
    {
        return $this->days(6);
    }

    /**
     * @return Frequencies
    */
    public function sundays()
    {
        return $this->days(7);
    }

    /**
     * @return Frequencies
    */
    public function weekdays()
    {
        return $this->days(1, 2, 3, 4, 5);
    }

    /**
     * @return Frequencies
    */
    public function weekends()
    {
        return $this->days(6, 7);
    }

    /**
     * @param int $hour
     * @param int $minute
     * @return Frequencies
    */
    public function at($hour = 0, $minute = 0)
    {
        return $this->dailyAt($hour, $minute);
    }

    /**
     * @return Frequencies
    */
    public function monthly()
    {
        return $this->monthlyOn(1);
    }


    /**
     * @param int $day
     * @return Frequencies
    */
    public function monthlyOn($day = 1)
    {
        return $this->replaceIntoExpression(1, [0, 0, $day]);
    }


    /**
     * @param $position
     * @param $value
     * @return Frequencies
    */
    public function replaceIntoExpression($position, $value)
    {
        $value = (array) $value;

        $expression = explode(' ', $this->expression);

        array_splice($expression, $position - 1, 1, $value);

        $expression = array_slice($expression, 0, 5);

        return $this->cron(implode(' ', $expression));
    }
}
