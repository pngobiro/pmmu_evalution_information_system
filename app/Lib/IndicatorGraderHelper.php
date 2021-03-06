<?php
namespace App\Lib;

class IndicatorGraderHelper{

  public $upperLimitScore;
  public $lowerLimitScore;
  public $upperLimitWeigtedScore;
  public $lowerLimitWeigtedScore;
  public $score;
  public $grade;
  public $actualCompositeScore;

  function __construct()
  {
    $this->upperLimitScore = 0;
    $this->lowerLimitScore = 0;
    $this->upperLimitWeigtedScore = 0;
    $this->lowerLimitWeigtedScore = 0;
    $this->score = 0;
    $this->grade = 0;
    $this->actualCompositeScore = 5;

  }

  public function getCompositeScore($actualCompositeScore)


  {

    $this->actualCompositeScore = $actualCompositeScore;
    

    switch ( $this->actualCompositeScore) {
      // case between 1 and 2
      case ($this->actualCompositeScore >= 1.00 && $this->actualCompositeScore <= 2.00):

          $this->upperLimitScore = 200;
          $this->lowerLimitScore = 120;
          $this->upperLimitWeigtedScore = 1;
          $this->lowerLimitWeightedScore = 2;

          break;
      // case between 2.01 and 2.6
      case ($this->actualCompositeScore  >= 2.01 && $this->actualCompositeScore <= 2.61):
          $this->upperLimitScore = 119;
          $this->lowerLimitScore = 101;
          $this->upperLimitWeigtedScore = 2.01;
          $this->lowerLimitWeightedScore = 2.6;

          break;
      // case between 2.61 and 3.2
      case ($this->actualCompositeScore >= 2.61 && $this->actualCompositeScore <= 3.21):
          $this->upperLimitScore= 100;
          $this->lowerLimitScore = 100;
          $this->upperLimitWeigtedScore = 2.61;
          $this->lowerLimitWeightedScore = 3.21;

          break;
      // case between 3.21 and 3.6
      case ($this->actualCompositeScore >= 3.21 && $this->actualCompositeScore <= 3.61):
          $this->upperLimitScore = 99;
          $this->lowerLimitScore = 75;
          $this->upperLimitWeigtedScore = 3.21;
          $this->lowerLimitWeightedScore = 3.6;

          break;

        

      case ($this->actualCompositeScore >= 3.61 && $this->actualCompositeScore <= 4.02):
          $this->upperLimitScore = 74;
          $this->lowerLimitScore = 50;
          $this->upperLimitWeigtedScore = 3.61;
          $this->lowerLimitWeightedScore = 4.0;

          break;

      case ($this->actualCompositeScore >= 4.01 && $this->actualCompositeScore <= 5):
          $this->upperLimitScore = 49.9;
          $this->lowerLimitScore = 10;
          $this->upperLimitWeigtedScore = 4.01;
          $this->lowerLimitWeightedScore = 5;
  
          break;

    
  }


  $this->score = $this->upperLimitScore - (($actualCompositeScore - $this->upperLimitWeigtedScore)*(($this->upperLimitScore- $this->lowerLimitScore)/($this->lowerLimitWeightedScore -$this->upperLimitWeigtedScore)));

  $this->grade = $this->getGrade($this->score);
 //return an array of the values
    return ['score' => $this->score,'grade' => $this->grade];

}


 private function getGrade($result){

      if ($result >= 120  AND $result <= 200) 
      {
          return "Outstanding";

      }
      elseif ($result >= 101 AND $result <= 119) 
      {
          return "Excellent";

      } elseif ($result == 100)
      {
          return "Very Good";

      } elseif ($result >= 75 AND $result <= 99){

            return "Good";

      } elseif ($result >= 50 AND $result <= 74){

          return "Fair";

      } elseif ($result >= 10 AND $result <= 49.9){

            return "Poor";

      }


  }

}

