# Response

## Part 1

-   I converted two query different queries into multi-table join. Each was taking 0.008 ms i.e 0.0016 in total and multi-table join completed same in 0.0012. I need not work indexes as it was already added.
-   Added redis cache with variable experiy as views count need not be real time data fetching.
-   Made little change in docker-compose - Added phpmyadmin for my debug purpose.
-   I didn't code for UI improvisation but idea would be do some gamification of leaderboard.
-   To increase engagement of creator with fans, we can do following
    1. Show with last active time of fans/creator
    2. Show location (country) and timezone
    3. Show age/gender, assuming fan gave his/her info with consensus.
    4. Before considering it as "a view" we should have few seceond of watching period of real views.
    5. Have virtual points for creator/fans on post created or viewed Or daily points on login.
    6. Can add super like feature.
    7. Rewards to meet creator in person.
    8. Notifications for more interations.
    9. DM (private chat) with creator/fans.
    10. Currently it looks like web based, we should offer mobile apps.

## Part 2

1. How would you prioritize what to work on? What parameters/criteria might you use?
   My priority would be security first, if anyone breaks the system then all gone. Then critical bugs and new features. I would create sprint with 10% hotfix, 40% bugs/fixes and 50% new features. There are expcetions as well depending on situations. Will definetly be in touch with business people.

My Backlog prioritywise task order would be:

-   Some of our integrations have credentials hard-coded into our private repo.
-   Fix - (Fan) I changed my handle but my profile still lists my old one.
-   In production, we have minimal logging.
-   Cross-posted content on multiple social media platforms shouldn't appear multiple times.
-   Add a 'similar creators' page.
-   Integrate with Snapchat.
-   Add - (Creator) I want more insight into what my fans respond the most to.
-   Add full test coverage.
-   One user reported a crash that recurs about once a week. We did a cursory investigation but haven't been able to reproduce the issue.

## Wrapping Up

I liked the overall interview experience and it was engaging. I think I would like to highlight here that it was good to have docker integrated; However for more on reliability, scalability, security and performance we may consider moving from current monolith based to microservice based architecture.
