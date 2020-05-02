<?php 
class mBot{
    public function __construct($url){
        $options = array(
            'http'=>array(
                'method'=>'GET',
                'user-agent'=>'mBot/0.1'
            )
            );
        $context = stream_context_create($options);    
        $this->document = new DomDocument();
        $this->document->loadHTML(file_get_contents($url,false,$context));
    }

    public function fetch(){
        $links = $this->document->getElementsByTagName('a');
        foreach($links as $item){
            echo $item->getAttribute('href')."<br/>";
        }
    }
}
$mBot = new mBot("https://mertbuldur.com");
$mBot->fetch();
