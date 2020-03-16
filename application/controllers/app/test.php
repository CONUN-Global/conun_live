<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Blocker\Bip39\Bip39;
use Blocker\Bip39\Util\Entropy;
class Test extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();


	}
	
	function index()
	{



        // some entropy value to be encoded with BIP39.
        $previousGeneratedEntropyHex = '7d3ad1cae4686c6cd5c8eaf95bec34c5';

//$some128bitValueAlreadyEncoded = 'walnut antenna forward shuffle invest legal confirm polar hope timber pear cover';

// create a bip39 instance.
        $bip39 = new Bip39('en');

// create an entropy instance from it's hex representation.
        $entropy = new Entropy($previousGeneratedEntropyHex);

        echo (string) $bip39->setEntropy($entropy)->encode();
// 'walnut antenna forward shuffle invest legal confirm polar hope timber pear cover'







	    $previousGeneratedEntropyHex = 'd3ad1cae4686c6cd5c8eaf95bec34c5';





    $some128bitValueAlreadyEncoded = "whip public tornado museum assault holiday purity deny verify salute bounce arch" ;

// create a bip39 instance.
$bip39 = new Bip39('en');

// decode the given word list into an entropy instance.
$entropy3 = $bip39->decode($some128bitValueAlreadyEncoded);



// decode the provided word sequence into a hexadecimal encoded entropy.

	}
		
}