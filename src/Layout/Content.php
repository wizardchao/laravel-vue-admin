<?php


namespace SmallRuralDog\Admin\Layout;

use Closure;
use SmallRuralDog\Admin\Components\Component;

class Content extends Component
{
    protected $componentName = 'Content';

    protected $showHeader = false;
    protected $title = "";
    protected $description = "";

    protected $rows = [];


    public function body($content)
    {
        return $this->row($content);
    }


    public function row($content)
    {

        if ($content instanceof Closure) {
            $row = new Row();
            call_user_func($content, $row);
            $this->addRow($row);
        } else {
            $this->addRow(new Row($content));
        }
        return $this;
    }

    protected function addRow(Row $row)
    {
        $this->rows[] = $row;
    }


    /**
     * @param bool $showHeader
     * @return $this
     */
    public function showHeader($showHeader=true)
    {
        $this->showHeader = $showHeader;
        return $this;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function title($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function description($description)
    {
        $this->description = $description;
        return $this;
    }







}
