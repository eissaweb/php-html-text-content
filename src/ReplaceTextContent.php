<?php 

namespace Eissaweb\PHPHtmlTextContent;

use PHPHtmlParser\Dom;

class ReplaceTextContent
{
	public static function replace($str, $search, $replace, $callback = null)
	{
		return (new static)->replaceContent($str, $search, $replace, $callback);
	}
	public function replaceContent($str, $search, $replace, $callback = null)
	{
		$dom = new Dom;
        $dom->loadStr($str);
        $container = $dom->root;
        $this->changeNodeText($container, $search, $replace, $callback);
    
        return $container->innerHTML;
	}
	public function changeNodeText($elem, $search, $replace, $callback = null) 
    {
        if (is_array($elem)) {
            foreach ($elem as $el) {
                $this->changeNodeText($el, $search, $replace, $callback);
            }
        }
        if (get_class($elem) == 'PHPHtmlParser\Dom\Node\HtmlNode') {
            foreach ($elem->getChildren() as $el) {
                $this->changeNodeText($el, $search, $replace, $callback);
            }
        }
        if (get_class($elem) == 'PHPHtmlParser\Dom\Node\TextNode') {
            $elem->setText(
                $this->changeTextContent($elem->text, $search, $replace, $callback)
            );
        }
    }
    protected function changeTextContent($str, $search, $replace, $callback = null) 
    {
		if (is_array($replace)) {
			$replace = array_map(function ($str) use ($callback){
				return $this->setText($str, $callback);
			}, $replace);
		} else {
			$replace = $this->setText($replace, $callback);
		}

		$text = str_replace($search, $replace, $str);
		
		return $text;
	}
	protected function setText($str, $callback = null) 
    {  
        if (is_callable($callback)) {
            return $callback($str);
        }
		return $str;
	}
}