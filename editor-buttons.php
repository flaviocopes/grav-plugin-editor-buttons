<?php
namespace Grav\Plugin;

use Grav\Common\GPM\GPM;
use Grav\Common\Grav;
use Grav\Common\Page\Page;
use Grav\Common\Page\Pages;
use Grav\Common\Plugin;

class EditorButtonsPlugin extends Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0]
        ];
    }

    /**
     *
     */
    public function onTwigSiteVariables()
    {
        if ($this->isAdmin()) {
            $this->grav['assets']->add('plugin://editor-buttons/admin/buttons/insert-headings/js/headings.js');
            $this->grav['assets']->add('plugin://editor-buttons/admin/buttons/insert-headings/css/headings.css');

            if ($this->config->get('plugins.editor-buttons.insert_table')) {
              $this->grav['assets']->add('plugin://editor-buttons/admin/buttons/insert-table/js/table.js');
              $this->grav['assets']->add('plugin://editor-buttons/admin/buttons/insert-table/css/table.css');
            }

            $noticesBC = $this->config->get('plugins.editor-buttons.insert_notice.info')
                || $this->config->get('plugins.editor-buttons.insert_notice.warning')
                || $this->config->get('plugins.editor-buttons.insert_notice.note')
                || $this->config->get('plugins.editor-buttons.insert_notice.tip');

            if ($this->config->get('plugins.markdown-notices.enabled') && $this->config->get('plugins.editor-buttons.insert_notice') || $noticesBC) {
              $this->grav['assets']->add('plugin://editor-buttons/admin/buttons/insert-notice/js/notice.js');
              $this->grav['assets']->add('plugin://editor-buttons/admin/buttons/insert-notice/css/notice.css');
            }

            $shortcodesUI = $this->config->get('plugins.editor-buttons.insert_shortcodes.tab')
                || $this->config->get('plugins.editor-buttons.insert_shortcodes.accordion')
                || $this->config->get('plugins.editor-buttons.insert_shortcodes.callout')
                || $this->config->get('plugins.editor-buttons.insert_shortcodes.imagecompare');
                
            if ($this->config->get('plugins.shortcode-ui.enabled') && $this->config->get('plugins.editor-buttons.insert_shortcodes') || $shortcodesUI) {
              $this->grav['assets']->add('plugin://editor-buttons/admin/buttons/insert-shortcodes/js/shortcodes-ui.js');
              $this->grav['assets']->add('plugin://editor-buttons/admin/buttons/insert-shortcodes/css/shortcodes-ui.css');
            }

            $shortcodesCORE = $this->config->get('plugins.editor-buttons.insert_shortcodes.column')
                || $this->config->get('plugins.editor-buttons.insert_shortcodes.safeemail')
                || $this->config->get('plugins.editor-buttons.insert_shortcodes.notice')
                || $this->config->get('plugins.editor-buttons.insert_shortcodes.underline')
                || $this->config->get('plugins.editor-buttons.insert_shortcodes.size');

            if ($this->config->get('plugins.shortcode-core.enabled') && $this->config->get('plugins.editor-buttons.insert_shortcodes') || $shortcodesCORE) {
              $this->grav['assets']->add('plugin://editor-buttons/admin/buttons/insert-shortcodes/js/shortcodes-core.js');
              $this->grav['assets']->add('plugin://editor-buttons/admin/buttons/insert-shortcodes/css/shortcodes-core.css');
            }

        }
    }
}
