<?php

// Define namespace for this class
namespace Amb\Classes\Controllers;

// Import necessary exceptions
use InvalidArgumentException;
use RuntimeException;
use Throwable;

// Define class MenuBuilder
class MenuBuilder
{
    // Private property to hold the final menu output
    private array $menu_output = [];

    /**
     * MenuBuilder constructor.
     *
     * Builds the menu tree and saves it to the $menu_output property.
     *
     * @param string $menu_slug The slug of the menu to build
     *
     * @throws InvalidArgumentException If the menu slug is empty
     */
    public function __construct(string $menu_slug)
    {
        // Check that a menu slug was provided
        if (empty($menu_slug)) {
            throw new InvalidArgumentException("Menu slug is required.");
        }

        // Get the registered menu locations for this theme
        $locations = get_nav_menu_locations();

        // Attempt to retrieve the menu object for the specified slug
        try {
            $menu = wp_get_nav_menu_object($locations[$menu_slug]);

            // If the menu object is not found, throw an exception
            if (!$menu) {
                throw new RuntimeException("Failed to retrieve menu object with slug: <strong>$menu_slug</strong>");
            }

            // Retrieve the menu items for the specified menu object
            $menu_items = wp_get_nav_menu_items($menu->term_id);

            // If the menu items array is not empty, build the menu tree and save it to the menu_output property
            if (is_array($menu_items)) {
                $this->menu_output = $this->buildMenuTree($menu_items);
            }
        } catch (Throwable $e) {
            // Catch any exceptions thrown during menu building and output the error message
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Recursively builds a hierarchical tree of menu items.
     *
     * @param array $elements An array of menu items to build the tree from
     * @param int $parent_id The ID of the parent menu item
     *
     * @return array The completed branch of the tree
     */
    private function buildMenuTree(array $elements, int $parent_id = 0): array
    {
        // Initialize an empty array to hold the current branch of the tree
        $branch = [];

        // Loop through each element in the menu items array
        foreach ($elements as $element) {
            // If the current element is a child of the current parent ID, recursively build its children
            if ($element->menu_item_parent == $parent_id) {
                $children = $this->buildMenuTree($elements, $element->ID);

                // If the element has children, add them as a property to the element object
                if ($children) {
                    $element->wpse_children = $children;
                }

                // Add the element object to the current branch of the tree
                $branch[$element->ID] = $element;
            }
        }

        // Return the completed branch of the tree
        return $branch;
    }

    /**
     * Returns the final output of the menu tree.
     *
     * @return array The completed menu tree
     */
    public function getOutput(): array
    {
        return $this->menu_output;
    }
}
