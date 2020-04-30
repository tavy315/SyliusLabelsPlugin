@displaying_labels
Feature: Displaying Product Labels
  In order to focus on special products
  As a Visitor
  I want to be able to see labels in the special product catalog

  Background:
    Given I am logged in as an administrator
    And the store operates on a single channel in "United States"
    And the store classifies its products as "T-Shirts", "Funny" and "Sad"
    And the store has a product "PHP T-Shirt"
    And this product belongs to "T-Shirts"
    And the store has a product "Java T-Shirt"
    And this product belongs to "T-Shirts"
    And the store has a product "C++ T-Shirt"
    And this product belongs to "T-Shirts"
    And the store has a product "Plastic Tomato"
    And this product belongs to "Funny"

  @ui
  Scenario: Displaying a product label based on product
    Given there is a label "New" configured with "PHP T-Shirt" product
    When I browse products from taxon "T-Shirts"
    Then I should see 1 product with label "New"
