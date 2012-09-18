Feature:
  As an User
  In order to be inspired
  I need the ability to see some stuff on a page

@mink:zombie
Scenario: Default
  Given I am on "/demo/box"
   Then the response status code should be 200
   Then I should see a "#box" element
    And I should see a "#color-select" element
    And the Color Select should have colors:
     |value          |
     |Choose a color |
     |Red            |
     |Green          |
     |Yellow         |
 
   When I select "red" from "color-select"
   Then The Box should be color "red"

   When I select "green" from "color-select"
   Then The Box should be color "green"
    And The Box should not be color "red"

   When I select "yellow" from "color-select"
   Then The Box should be color "yellow"
    And The Box should not be color "red"
    And The Box should not be color "green"