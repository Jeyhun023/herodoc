<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;

class FindHome extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'find:home';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find home me from Bina.az please';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $old_id = 2487439;
        $x = 1;
        try {
            while ( true ) {
                $html = file_get_contents("https://bina.az/baki/kiraye/menziller/kohne-tikili/1-otaqli");
                preg_match_all('@<div class="items-i" data-item-id="(.*?)">(.*?)</div>@si', $html, $ids);
                $new_id = $ids[1][0];

                if($new_id > $old_id){
                    preg_match_all('@<div class="items-i" data-item-id="'.$new_id.'">(.*?)<div class="card_params"><div class="abs_block"><div class="price"><span class="price-val">(.*?)</span>(.*?)</div></div>(.*?)</div></div>@si', $html, $prices);
                    $price = $prices[2][0];
                    if($price <= 400){
                        preg_match_all('@<div class="items-i" data-item-id="'.$new_id.'"><a class="item_link" target="_blank" href="(.*?)"></a>(.*?)@si', $html, $hrefs);
                        $href = 'https://bina.az'.$hrefs[1][0];
                        echo $href. PHP_EOL;
                        Mail::raw('Ceki tezol ev var teze '.$price.' qiymete. Gir bax: '.$href, function($msg) {$msg->to('creshidov23@gmail.com')->subject('Ev tapdim!'); });
                    }
                    $old_id = $new_id;
                }else{
                    echo $x.") Nothing :(". PHP_EOL;
                    $x++;
                }
            }
        } catch (Exception $e) {
            echo "Error";
        }
    }
}
