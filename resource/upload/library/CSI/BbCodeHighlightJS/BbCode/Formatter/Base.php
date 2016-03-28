<?php namespace CSI\BbCodeHighlightJS\BbCode\Formatter;

/**
 * Class Base
 * @package CSI\BbCodeHighlightJS\BbCode\Formatter
 */
class Base
{
  /**
   * @param array $tag
   * @param array $rendererStates
   * @param \XenForo_BbCode_Formatter_Base $formatter
   * @return mixed
   */
  public static function getBbCodeHighlightJsSrc(array $tag, array $rendererStates, \XenForo_BbCode_Formatter_Base $formatter)
  {
    $xenOptions = \XenForo_Application::get('options');
    $xenVisitor = \XenForo_Visitor::getInstance();
    $tagOption = array_map('trim', explode('|', $tag['option']));

    if (count($tagOption) > 1) {
      $optLang = $tagOption[0];
    } else {
      $optLang = $tag['option'];
    }

    if (isset($optLang) && !preg_match('#^([a-zA-Z]+)$#', $optLang)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    $tagContent = $formatter->renderSubTree($tag['children'], $rendererStates);
    $tagContent = trim($tagContent);
    $view = $formatter->getView();

    if ($view) {
      $template = $view->createTemplateObject('csiXF_bbCode_FAF39740_tag_src',
        array(
          'content' => $tagContent,
          'lang' => $optLang,
        ));

      $tagContent = $template->render();
      return trim($tagContent);
    }

    return $tagContent;
  }

  /**
   * @param array $tag
   * @param array $rendererStates
   * @param \XenForo_BbCode_Formatter_Base $formatter
   * @return mixed
   */
  public static function getBbCodeHighlightJsSrci(array $tag, array $rendererStates, \XenForo_BbCode_Formatter_Base $formatter)
  {
    $xenOptions = \XenForo_Application::get('options');
    $xenVisitor = \XenForo_Visitor::getInstance();
    $tagOption = array_map('trim', explode('|', $tag['option']));

    if (count($tagOption) > 1) {
      $optLang = $tagOption[0];
    } else {
      $optLang = $tag['option'];
    }

    $tagContent = $formatter->renderSubTree($tag['children'], $rendererStates);
    $tagContent = trim($tagContent);
    $view = $formatter->getView();

    if ($view) {
      $template = $view->createTemplateObject('csiXF_bbCode_FAF39740_tag_srci',
        array(
          'content' => $tagContent,
          'lang' => $optLang,
        ));

      $tagContent = $template->render();
      return trim($tagContent);
    }

    return $tagContent;
  }
}
