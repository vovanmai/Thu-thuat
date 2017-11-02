<?php 
class Pagination
{
	public $current_page;
	public $page_total;
	public $row_total;
	public $number_news_per_page;
	public $start_loop;
	public $end_loop;
	public $offset;
	public $pagination_sql;
	public $table;



	public function html()
	{
		$this->page_total=ceil($this->row_total/$this->number_news_per_page);
		return json_encode($this->table);
	}
}
?>