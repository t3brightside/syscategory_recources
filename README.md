# System Category Resources
[![Packagist](https://img.shields.io/packagist/v/t3brightside/syscategory_resources.svg?style=flat)](https://packagist.org/packages/t3brightside/syscategory_resources)
[![Software License](https://img.shields.io/badge/license-GPLv3-brightgreen.svg?style=flat)](LICENSE)
[![Brightside](https://img.shields.io/badge/by-t3brightside.com-orange.svg?style=flat)](https://t3brightside.com)

**TYPO3 CMS extension that adds images and files option for system categories.**

Adds new 'Resources' tab and this two fields in it – that's it.

## System requirements

- TYPO3 10.4 LTS

## Installation

Coming soon...for now available from Github.
 - From TER: **syscategory_resources**, or composer: **t3brightside/syscategory_resources**
 - FE implantation you got to do by yourself but check out examples below...

## Data processing example
Please note your sys_categories have to be in the same site root.
```typoscript
page = PAGE
page {
    10 = FLUIDTEMPLATE
    10 {
        ...
        dataProcessing {
        ...
        80 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
        80 {
            table = sys_category
            join = sys_category_record_mm ON (sys_category_record_mm.uid_local=sys_category.uid)
            where = sys_category_record_mm.tablenames='pages' AND sys_category_record_mm.uid_foreign = ###pageuid###
            markers.pageuid.field = uid
            pidInList = 0,-1
            selectFields = sys_category.*
            recursive = 99
            as = categories
            dataProcessing {
                10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
                10.references.fieldName = tx_syscategory_resources_images
                10.as = images
                20 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
                20.references.fieldName = tx_syscategory_resources_files
                20.as = files
                30 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
                30 {
                    if.isTrue.field = parent
                    table = sys_category
                    pidInList = 0
                    uidInList.field = parent
                    recursive = 99
                    as = parentcategory
                    dataProcessing {
                        10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
                        10.references.fieldName = tx_syscategory_resources_images
                        10.as = images
                        20 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
                        20.references.fieldName = tx_syscategory_resources_files
                        20.as = files
                    }
                }
            }
        }
    }
}  
```

## Template example
This one shows list of categories with the image with the fallback to the parent category image
```XML
<f:if condition="{categories}">
    <f:for each="{categories}" as="category" iteration="iterator">
        <f:if condition="{category.parentcategory.0.images} || {category.images}">
            <f:if condition="{category.images}">
                <f:then>
                    <f:image image="{category.images.0}" />
                </f:then>
                <f:else>
                    <f:image image="{category.parentcategory.0.images.0}" />
                </f:else>
            </f:if>
        </f:if>
        {category.data.title}<br />
    </f:for>
</f:if>
```

## Sources

-  [GitHub][a47ab545]
-  [Packagist][40819ab1]
-  [TER][15e0f507]

  [a47ab545]: https://github.com/t3brightside/syscategory_resources "GitHub"
  [40819ab1]: https://packagist.org/packages/t3brightside/syscategory_resources "Packagist"
  [15e0f507]: https://extensions.typo3.org/extension/syscategory_resources/ "Typo3 Extension Repository"

Development and maintenance
---------------------------

[Brightside OÜ – TYPO3 development and hosting specialised web agency][ab26eed2]

  [ab26eed2]: https://t3brightside.com/ "TYPO3 development and hosting specialised web agency"
