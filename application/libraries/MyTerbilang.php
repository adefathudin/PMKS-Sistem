<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
FileName	Terbilang
Created On	3:54:54 PM
@garaulo (fauziansyah26@gmail.com)
Description 	:
*/

class MyTerbilang {
    
    private function konversi($x){
      $x = abs($x);
      $angka = array ("","satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
      $temp = "";

      if($x < 12){
       $temp = " ".$angka[$x];
      }else if($x<20){
       $temp = $this->konversi($x - 10)." belas";
      }else if ($x<100){
       $temp = $this->konversi($x/10)." puluh". $this->konversi($x%10);
      }else if($x<200){
       $temp = " seratus". $this->konversi($x-100);
      }else if($x<1000){
       $temp = $this->konversi($x/100)." ratus". $this->konversi($x%100);   
      }else if($x<2000){
       $temp = " seribu". $this->konversi($x-1000);
      }else if($x<1000000){
       $temp = $this->konversi($x/1000)." ribu". $this->konversi($x%1000);   
      }else if($x<1000000000){
       $temp = $this->konversi($x/1000000)." juta". $this->konversi($x%1000000);
      }else if($x<1000000000000){
       $temp = $this->konversi($x/1000000000)." milyar". $this->konversi($x%1000000000);
      }

      return $temp;
     }
  
    private function tkoma($x){
        $a = 0;
        $str = stristr($x,".");
        $ex = explode('.',$x);
        
        if(count($ex) <= 1){
            return FALSE;
        }
        
        if(($ex[1]/10) >= 1){
         $a = abs($ex[1]);
        }
        $string = array("nol", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan",   "sembilan","sepuluh", "sebelas");
        $temp = "";

        $a2 = $ex[1]/10;
        $pjg = strlen($str);
        $i =1;


        if($a>=1 && $a< 12){   
         $temp .= " ".$string[$a];
        }else if($a>12 && $a < 20){   
         $temp .= $this->konversi($a - 10)." belas";
        }else if ($a>20 && $a<100){   
         $temp .= $this->konversi($a / 10)." puluh". $this->konversi($a % 10);
        }else{
         if($a2<1){

          while ($i<$pjg){     
           $char = substr($str,$i,1);     
           $i++;
           $temp .= " ".$string[$char];
          }
         }
        }  
        return $temp;
    }
 
 public function hasil($x){
    if($x<0){
     $hasil = "minus ".trim($this->konversi(x));
    }else{
     $poin = trim($this->tkoma($x));
     $hasil = trim($this->konversi($x));
    }

    if($poin){
       $hasil = $hasil." koma ".$poin;
      }else{
       $hasil = $hasil;
      }
      return $hasil;  
   }
}