<?php
    class Calendar {
        private $activeYear, $activeMonth, $activeDay;
        private $events = [];

        public function __construct($date = null){
            $this->active_year = $date != null ? date('Y', strtotime($date)) : date('Y');
            $this->active_month = $date != null ? date('m', strtotime($date)) : date('m');
            $this->active_day = $date != null ? date('d', strtotime($date)) : date('d');
        }

        public function add_event($txt, $date, $days = 1, $color = ''){
            $color = $color ? '' . $color : $color;
            $this->events[] = [$txt, $date, $days, $color];
        }

        public function __toString(){
            $numDays = date('t', strtotime($this->active_day . '-' . $this->active_month . $this->active_year));
            $numDays_lastMonth = date('j', strtotime('last day of previous month', strtotime($this->active_day . '-' .  $this->active_month . '-' . $this->active_year)));
            $days = [0=>'Sun', 1=>'Mon', 2=>'Tue', 3=>'Wed', 4=>'Thu', 5=>'Fri', 6=>'Sat'];
            $firstDayOfWeek = array_search(date('D', strtotime($this->active_year . '-' . $this->active_month . '-1')), $days);
            $html = '<div class="calendar">';
            $html .= '<div class="header">';
            $html .= '<div class="month-year">';
            $html .= date('F Y', strtotime($this->active_year. '-' . $this->active_month . '-' . $this->active_day));
            $html .= '</div>';
            $html .= '<div>';

            // $html .= '<button name="lastMonth" class="lessThan"><</button>';
            // $html .= '<button name="nextMonth" class="greaterThan">></button>';

                

            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="days">';

                foreach($days as $day){
                    $html .= '
                        <div class="day-name">
                            '. $day . '
                        </div>
                    ';
                }

                for($i = $firstDayOfWeek; $i > 0; $i--){
                    $html .= '
                        <div class="day-num ignore">
                            ' . ($numDays_lastMonth-$i+1) . '
                        </div>
                    ';
                }

                for($i = 1; $i <= $numDays; $i++){
                    $selected = '';
                    if($i == $this->active_day){
                        $selected = ' selected';
                    }

                    $html .= '<div class="day-num' . $selected . '">';
                    $html .= '<span>' . $i . '</span>';
                    foreach($this->events as $event){
                        for($d = 0; $d <= ($event[2]-1); $d++){
                            if(date('y-m-d', strtotime($this->active_year . '-' . $this->active_month . '-' . $i . ' -' . $d . ' day')) == date('y-m-d', strtotime($event[1]))){
                                $html .= '<div class="event ' . $event[3] . '">';
                                $html .= $event[0];
                                $html .= '</div>';
                            }
                        }
                    }
                    $html .= '</div>';
                }
                for($i = 1; $i <= (42-$numDays-max($firstDayOfWeek, 0)); $i++){
                    $html .= '
                        <div class="day-num ignore">
                            ' . $i . '
                        </div>
                    ';
                }
                $html .= '</div>';
                $html .= '</div>';
                return $html;
        }
    }
?>