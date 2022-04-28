switch ($this->indicator_raw_score) {

// if raw score is less is betweeen 0.5 and 1.5

case $this->indicator_raw_score >= 1.0 && $this->indicator_raw_score <= 1.99:
return 'Outstanding';
break;
case $this->indicator_raw_score  >=  2.0 && $this->indicator_raw_score <= 2.99:
return 'Excellent';
break;
case $this->indicator_raw_score  >=  3.0 && $this->indicator_raw_score <= 3.99:
return 'Very Good';
break;
case $this->indicator_raw_score  >=  4.0 && $this->indicator_raw_score <= 4.99:
return 'Good';
break;
case $this->indicator_raw_score  >=  5.0 && $this->indicator_raw_score <= 5.99:
return 'Fair';
break;
case $this->indicator_raw_score  >=  6:
return 'Poor';
break;
}