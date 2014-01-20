Feature:
  As an User (WTF)
  In order to be inspired
  I need the ability to see some stuff on a page

@mink:goutte @Story-123 @web-services
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
 
   When I select "Red" from "color-select"
   Then The Box should be color "red"

   When I select "Green" from "color-select"
   Then The Box should be color "green"
    And The Box should not be color "red"

   When I select "Yellow" from "color-select"
   Then The Box should be color "yellow"
    And The Box should not be color "red"
    And The Box should not be color "green"
