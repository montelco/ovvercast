<?php
	//Requiring all Last.FM API docs to be loaded in.
	require('tag.php');

	//Required format to return Last.fm data (options are json or xml)
	$format = 'json';
	$limit = '5';

	//Get current weather conditions from Dark Sky Forecast API.
	$currentConditions = $_POST['current'];

	//Using the returned current weather, explode and cast the current temperature, cloud cover pecentage, and chance of rain.
	list($temp, $cloud, $precip) = explode(',', $currentConditions);
	$temp = (int) $temp;
	$cloud = (float) $cloud;
	$precip = (float) $precip;

	//echo $temp . "<br>";
	//echo $cloud . "<br>";
	//echo $precip;
	//exit();

	/*	Each weather option has a randomizer.
	*	By running each randomizer only once
	*	Less processing power is wasted.
	*/	

	//Cold Days
	if($temp >= 32 && $temp <= 49){
		//Cold Clear (Less than 15% clouds)(Less than 15% rain)
		if($cloud <= 0.15){
			if($precip <= 0.15){
				//Randomizer
				$strings = array('jazz','piano','swing','miles davis');
				$key = array_rand($strings);
				$CC = $strings[$key];
				//Final Selection Output
				$currentBest = (string) $CC;
			}
		}
		//Cold Party Cloudy (Less than 50% clouds)(Less than 15% rain)
		if($cloud >= 0.16 && $cloud <= 0.5){
			if($precip <= 0.15){
				//Randomizer
				$strings = array('jazz fusion','cosmic jazz','smooth jazz','john coltrane');
				$key = array_rand($strings);
				$CPC = $strings[$key];
				//Final Selection Output
				$currentBest = (string) $CPC;
			}
		}
		//Cold Mostly Cloudy (More than 50% clouds)(Less than 15% rain)
		if($cloud >= 0.51){
			if($precip <= 0.15){
				//Randomizer
				$strings = array('avant-garde jazz','improvisation','african jazz','sun ra');
				$key = array_rand($strings);
				$CMC = $strings[$key];
				//Final Selection Output
				$currentBest = (string) $CMC;
			}
		}
		//Cold Chance of Rain (16% - 74% clouds)(Chance of 0% - 60% rain)
		if($cloud <= 0.74){
			if($precip >= 0.16 && $precip <= 0.6){
				//Randomizer
				$strings = array('chill out','downtempo','lounge','cfcf');
				$key = array_rand($strings);
				$CCR = $strings[$key];
				//Final Selection Output
				$currentBest = (string) $CCR;
			}
		}
		//Cold Rain (75% - 100% clouds)(Chance of 61% - 100% rain)
		if($cloud <= 0.75){
			if($precip >= 0.61){
				//Randomizer
				$strings = array('british','britpop','brit pop','coldplay');
				$key = array_rand($strings);
				$CR = $strings[$key];
				//Final Selection Output
				$currentBest = (string) $CR;
			}
		}
	}

	//Warm Days
	if($temp >= 50 && $temp <= 74){
		//Warm Clear (Less than 15% clouds)(Less than 15% rain)
		if($cloud <= 0.15){
			if($precip <= 0.15){
				//Randomizer
				$strings = array('british','britpop','brit pop','queens of the stone age');
				$key = array_rand($strings);
				$WC = $strings[$key];
				//Final Selection Output
				$currentBest = (string) $WC;
			}
		}
		//Warm Party Cloudy (Less than 50% clouds)(Less than 15% rain)
		if($cloud >= 0.16 && $cloud <= 0.5){
			if($precip <= 0.15){
				//Randomizer
				$strings = array('stoner rock','stoner','hard rock');
				$key = array_rand($strings);
				$WPC = $strings[$key];
				//Final Selection Output
				$currentBest = (string) $WPC;
			}
		}
		//Warm Mostly Cloudy (More than 50% clouds)(Less than 15% rain)
		if($cloud >= 0.51){
			if($precip <= 0.15){
				//Randomizer
				$strings = array('90s','grunge','alternative rock','nirvana');
				$key = array_rand($strings);
				$WMC = $strings[$key];
				//Final Selection Output
				$currentBest = (string) $WMC;
			}
		}
		//Warm Chance of Rain (16% - 74% clouds)(Chance of 0% - 60% rain)
		if($cloud >= 0.16 && $cloud <= 0.74){
			if($precip >= 0 && $precip <= 0.6){
				//Randomizer
				$strings = array('indie rock','indie','lo-fi','mac demarco');
				$key = array_rand($strings);
				$WCR = $strings[$key];
				//Final Selection Output
				$currentBest = (string) $WCR;
			}
		}
		//Warm Rain (45% - 100% clouds)(Chance of 61% - 100% rain)
		if($cloud >= 0.45){
			if($precip >= 0.61){
				//Randomizer
				$strings = array('chill out','downtempo','lounge','cfcf');
				$key = array_rand($strings);
				$WR = $strings[$key];
				//Final Selection Output
				$currentBest = (string) $WR;
			}
		}
	}

	//Hot Days
	if($temp >= 75){
		//Hot Clear (Less than 15% clouds)(Less than 15% rain)
		if($cloud <= 0.15){
			if($precip <= 0.15){
				//Randomizer
				$strings = array('rnb','r&b','hip-hop','prog-rnb','alternative rnb','frank ocean');
				$key = array_rand($strings);
				$HC = $strings[$key];
				//Final Selection Output
				$currentBest = (string) $HC;
			}
		}
		//Hot Party Cloudy (Less than 50% clouds)(Less than 15% rain)
		if($cloud >= 0.16 && $cloud <= 0.5){
			if($precip <= 0.15){
				//Randomizer
				$strings = array('pop rock','pop','female vocalists','katy perry');
				$key = array_rand($strings);
				$HPC = $strings[$key];
				//Final Selection Output
				$currentBest = (string) $HPC;
			}
		}
		//Hot Mostly Cloudy (More than 50% clouds)(Less than 15% rain)
		if($cloud >= 0.51){
			if($precip <= 0.15){
				//Randomizer
				$strings = array('acoustic','folk','singer-songwriter','sara bareilles');
				$key = array_rand($strings);
				$HMC = $strings[$key];
				//Final Selection Output
				$currentBest = (string) $HMC;
			}
		}
		//Hot Chance of Rain (16% - 74% clouds)(Chance of 0% - 60% rain)
		if($cloud >= 0.16 && $cloud <= 0.74){
			if($precip >= 0 && $precip <= 0.6){
				//Randomizer
				$strings = array('edm','dnb','electronica', 'idm','ambient','canadian','boards of canada');
				$key = array_rand($strings);
				$HCR = $strings[$key];
				//Final Selection Output
				$currentBest = (string) $HCR;
			}
		}
		//Hot Rain (45% - 100% clouds)(Chance of 61% - 100% rain)
		if($cloud >= 0.45){
			if($precip >= 0.61){
				//Randomizer
				$strings = array('trip-hop','trip hop','turntablism','massive attack');
				$key = array_rand($strings);
				$HR = $strings[$key];
				//Final Selection Output
				$currentBest = (string) $HR;
			}
		}
	}

	//Initilise and call out to tag. Afterwards, push content for the index file to receive.
	$ovvercastSession = new Tag();
	$ovvercastSessionRadio = $ovvercastSession->startRadio($currentBest);
	echo '<a href="' . $ovvercastSessionRadio . '">
			<div class="radioButton">
				<div class="startRadio">
					start<br>' . 
					$currentBest. '<br>
					radio
				</div>
			</div>
		</a>'
?>