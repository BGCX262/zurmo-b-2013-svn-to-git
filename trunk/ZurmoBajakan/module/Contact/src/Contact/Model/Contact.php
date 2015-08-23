<?php
namespace Album\Model;

class Album
{
    public $id;
    public $artist;
    public $title;

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->artist = (isset($data['artist'])) ? $data['artist'] : null;
        $this->title  = (isset($data['title'])) ? $data['title'] : null;
    }
    public function connectDb()
    {
    	
    	$viewsql=mysql_query("select * from contact");
    	while($row == mysql_fetch_array($viewsql));
    }
    
}
?>
