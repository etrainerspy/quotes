<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function getQuotes()
  {
    /*
    config(['quotes.quotes' => [
        [
        'text'=>'Be yourself; everyone else is already taken.',
        'author'=>'Oscar Wilde'
        ],
        [
        'text'=>'Be the change that you wish to see in the world.',
        'author'=>'Mahatma Gandhi'
        ],
        [
        'text'=>'No one can make you feel inferior without your consent.',
        'author'=>'Eleanor Roosevelt',
        ]
      ]
    ]);
    */

    $aryQuotes = config('quotes.quotes');

     return view('quotes', [
        'header' => 'List of quotes',
        'aQuotes' => $aryQuotes
     ]);
  }

  public function random()
  {
    $aryQuotes = config('quotes.quotes');

    //$aryCount = count($aryQuotes);
    $lastIndex = count($aryQuotes) - 1;
    $randomChoice = rand(0,$lastIndex);

    if($lastIndex < 0) {
       $aryQuotes[$randomChoice] = [
        'text'=>'* Your quotes list is empty. *',
        'author'=>''
        ];
    }

     return view('quotePicked', [
        'aQuotes' => $aryQuotes[$randomChoice]
     ]);
  }

  public function quoteByDate()
  {

    echo "what is this\n\n";
    if (isset($_GET['d']))
    {
      $datePicked = htmlspecialchars($_GET["d"]);
      $regex = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
      $validDate = false;


      echo "date picked is: ".$datePicked. "\n\n";
      if (preg_match($regex, $datePicked))
      {
        $year = substr($datePicked, 0, 4);
        $month = substr($datePicked, 5, 2);
        $day =  substr($datePicked, 8, 2);

        if (checkdate ($month, $day, $year))
        {
           $validDate = true;
        }
      }
    } else
    {
      $validDate = true;
      $datePicked = date("Y-m-d");
      echo "date picked is: ".$datePicked. "\n\n";
    }

    $aryQuotes = config('quotes.quotes');

    $DayOfWeek = date("d", strtotime($datePicked))+0;

    if(!($validDate)) {
       $aryQuotes[$DayOfWeek] = [
        'text'=>'* Your Date format is invalid. *',
        'author'=>''
        ];
    }
    elseif(empty($aryQuotes)) {
       $aryQuotes[$DayOfWeek] = [
        'text'=>'* Your quotes list is empty. *',
        'author'=>''
        ];
    }

    return view('quotePicked', [
      //'header' => 'Quote for Date: '. $datePicked,
      //'dayOfWeek' => $DayOfWeek,
      'aQuotes' => $aryQuotes[$DayOfWeek]
    ]);
  }

  public function search()
  {
    $aryQuotes = config('quotes.quotes');

    $aryResult = array();

    if (isset($_GET['q']))
    {

      $searchTerm = strtolower(htmlspecialchars($_GET["q"]));
      //$regex = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
      //$validDate = false;
      //$displayDate = "Invalid Date!";

      //if (preg_match($regex, $datePicked))
      //{
      //}
      $displaySearchTerm = $searchTerm;

      foreach ($aryQuotes as $aryQuote)
      {
        if (strpos(strtolower($aryQuote['text']), $searchTerm) !== false) {
          $aryResult[] = $aryQuote;
        }
      }
    }
    else
    {
      $displaySearchTerm = 'missing search term';
    }

     return view('search', [
        'header' => 'Quote with Search Term: '. $displaySearchTerm,
        'aQuotes' => $aryResult
     ]);
  }

  public function home()
  {
     return view('welcome', [
     ]);
  }
}
