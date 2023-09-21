-- Task 1: Retrieve duplicate email addresses for deceased users with default emails
-- This SQL query selects email addresses that belong to users who are deceased
-- and have default email addresses, and it identifies duplicates.
-- isDeaceased: 1 means "deceased", 0 means "alive"
-- isDefault: 1 means "it is default" 0 means it is not default

SELECT emailaddress 
FROM emails 
JOIN profiles ON profiles.userRefID = emails.userRefID 
WHERE profiles.isDeceased = 0 AND emails.isDefault = 1 
GROUP BY emails.emailaddress 
HAVING COUNT(*) > 1;