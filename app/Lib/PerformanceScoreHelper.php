<?php
namespace App\Lib;

class PerformanceScoreHelper {

    public $performance_score;

    function __construct()
    {
        $this->performance_score = 0;
    }


    function getPerformanceGrade($indicator_type,$performance_score)
    {
        $this->performance_score = $performance_score;
        switch ($indicator_type) {
            // Special Indicator
            case 1:

                if ($this->performance_score >99)

                {
                    return 'Outstanding';
                }
                
                elseif ($this->performance_score > 78 && $this->performance_score <= 99)

                {
                    return 'Excellent';
                }
            
                elseif ($this->performance_score >68 && $this->performance_score <= 78)

                {
                    return 'Very Good';
                }
            
                elseif ($this->performance_score > 58 && $this->performance_score<= 68)

                {
                    return 'Good';
                }
            
                elseif ($this->performance_score >48 && $this->performance_score<= 58)

                {
                    return 'Fair';
                }

                elseif ($this->performance_score <49)

                {
                    return 'Poor';
                }
                    break;


            case 2 && 3:

            // Normal and declining indicators

            if ($this->performance_score >119.49)

            {
                return 'Outstanding';
            }
            

            elseif ($this->performance_score >100 && $this->performance_score <119.5)

            {
                return 'Excellent';
            }
        
            elseif ($this->performance_score >99.49 && $this->performance_score <100.5)

            {
                return 'Very Good';
            }
        
            elseif ($this->performance_score >= 75.49 && $this->performance_score<99.5)

            {
                return 'Good';
            }
        
            elseif ($this->performance_score >=50.49 && $this->performance_score < 75.5)

            {
                return 'Fair';
            }

            elseif ($this->performance_score < 50)

            {
                return 'Poor';
            }
        }
    }
}