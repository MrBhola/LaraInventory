<template>
    <div id="readme" class="Box-body readme blob instapaper_body js-code-block-container">
        <article class="markdown-body entry-content p-3 p-md-6" itemprop="text">
            <h1>
                <a
                    id="user-content-project-introduction"
                    class="anchor"
                    aria-hidden="true"
                    href="#project-introduction"
                >
                    <svg
                        class="octicon octicon-link"
                        viewBox="0 0 16 16"
                        version="1.1"
                        width="16"
                        height="16"
                        aria-hidden="true"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"
                        ></path>
                    </svg>
                </a>Project Introduction
            </h1>
            <p>We are building an record keeping system for variable inventories. An inventory is an item kept in storage for future/current use. Everyone keeps record of inventory - its just different approaches. Lets give an approach to how we keep our records.</p>
            <p>We want to build a record keeping system that can add different set of fields for different items. For example, I want to keep record of two separate categories of items, say, Cans of Juice for different flavors and Laptop Computers of various brands. These two items can have few common fields while many different fields like brand, quantity, name, sku, color as same fields while RAM, Processor, Battery Life, Flavour, Volume, Expiry Date, etc are different fields.</p>
            <p>But I do not want to be restricted to few field names only. I want to add my own field name and store the value for it if an item requires it. Example, I want to add a Model Number field for the item that belongs to Computers category. Similarly, I may want to add Juice Supplier field for the Juice category. Let's summarize this in a few acceptance criteria as below:</p>
            <h1>
                <a
                    id="user-content-project-objectives"
                    class="anchor"
                    aria-hidden="true"
                    href="#project-objectives"
                >
                    <svg
                        class="octicon octicon-link"
                        viewBox="0 0 16 16"
                        version="1.1"
                        width="16"
                        height="16"
                        aria-hidden="true"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"
                        ></path>
                    </svg>
                </a>Project Objectives
            </h1>
            <ul>
                <li>
                    One can see an
                    <strong>Add Item</strong> button that takes me to a form where I can add various required fields.
                </li>
                <li>One can choose a category to separate my item from one another while adding the item</li>
                <li>One can add/remove an entirely new field name and its value for my item.</li>
                <li>One can save my item after passing validations</li>
                <li>One can view my list of items by category</li>
                <li>One can view a single item separately</li>
                <li>One can update any item at my will and the updated data is rendered in the list</li>
                <li>One can remove an item from my list and the total count of the item is updated accordingly</li>
                <li>One can view/add/remove categories.</li>
                <li>One can see the number of items stored in each category in the category list page.</li>
            </ul>
            <h1>
                <a
                    id="user-content-copy-all-rights-reserved"
                    class="anchor"
                    aria-hidden="true"
                    href="#copy-all-rights-reserved"
                >
                    <svg
                        class="octicon octicon-link"
                        viewBox="0 0 16 16"
                        version="1.1"
                        width="16"
                        height="16"
                        aria-hidden="true"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"
                        ></path>
                    </svg>
                </a>&amp;copy All rights reserved.
            </h1>
            <pre><code>    Any redistribution or reproduction of part or all of the contents in any form is prohibited other than the following:
                        <li> you may download to a local hard disk extracts for your personal and non-commercial use only.</li>
    </code></pre>
        </article>
    </div>
</template>
