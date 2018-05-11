<?php
namespace Medienagenten\BootstrapAccordion\ViewHelpers;

/**
 * ViewHelper zur Rückgabe eines geparsten tt_content Elementes
 *
 * Usage:
 * {namespace ba=Medienagenten\BootstrapAccordion\ViewHelpers}
 * <ba:content uid="{data.uid}" />
 */

class ContentViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
     * Parse content element
     *
     * @param    int           UID des Content Element
     * @return   string        Geparstes Content Element
     */
    public function render($uid)
    {
        $conf = array( // config
            'tables' => 'tt_content',
            'source' => $uid,
            'dontCheckPid' => 1,
        );

        return $this->objectManager->get('TYPO3\CMS\Frontend\ContentObject\RecordsContentObject')->render($conf);
    }
}
