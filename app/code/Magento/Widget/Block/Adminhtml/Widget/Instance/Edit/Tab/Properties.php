<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

/**
 * Widget Instance Properties tab block
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
namespace Magento\Widget\Block\Adminhtml\Widget\Instance\Edit\Tab;

class Properties extends \Magento\Widget\Block\Adminhtml\Widget\Options implements
    \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('Widget Options');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Widget Options');
    }

    /**
     * Returns status flag about this tab can be showen or not
     *
     * @return true
     */
    public function canShowTab()
    {
        return $this->getWidgetInstance()->isCompleteToCreate();
    }

    /**
     * Returns status flag about this tab hidden or not
     *
     * @return true
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Getter
     *
     * @return \Magento\Widget\Model\Widget\Instance
     */
    public function getWidgetInstance()
    {
        return $this->_coreRegistry->registry('current_widget_instance');
    }

    /**
     * Prepare block children and data.
     * Set widget type and widget parameters if available
     *
     * @return $this
     */
    protected function _preparelayout()
    {
        $this->setWidgetType(
            $this->getWidgetInstance()->getType()
        )->setWidgetValues(
            $this->getWidgetInstance()->getWidgetParameters()
        );
        return parent::_prepareLayout();
    }

    /**
     * Add field to Options form based on option configuration
     *
     * @param \Magento\Framework\Object $parameter
     * @return \Magento\Framework\Data\Form\Element\AbstractElement
     */
    protected function _addField($parameter)
    {
        if ($parameter->getKey() != 'template') {
            return parent::_addField($parameter);
        }
        return false;
    }
}
