[![Build Status](https://scrutinizer-ci.com/g/kuusas/learn-symfony/badges/build.png?b=master)](https://scrutinizer-ci.com/g/kuusas/learn-symfony/build-status/master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/kuusas/learn-symfony/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/kuusas/design-patterns-in-php/?branch=master)

learn-symfony3
==============

## How to contribute?
Goal: 1 topic - 1 commit.

1. Pick topic from [topic list](TODO.md).
2. Create [new issue](https://github.com/kuusas/learn-symfony/issues/new) (if nobody created so far). This will prevent us all from doing the same thing.
3. Write example code to cover the topic.
4. Add explanatory comments.
5. Tests, of course.
6. Update README.md `Already done` section with link(s) to official Symfony documentation where the topic is explained.
7. Mark topic as done with `+` in topic list
8. Commit. Message should be formatted as `Topic: subtopic`, for example: `Dependency Injection: Factories`.
9. Do **Pull Request**.

See [example commit](https://github.com/kuusas/learn-symfony/commit/b6e30ff6bba8a0005696b48a37baf1991dd608e9).


## How-tos
#### How to run tests?
Run `$ phpunit` in project directory.

## Already done

1. Creating Symfony project using `symfony` installer CLI tool. http://symfony.com/doc/current/book/installation.html
```
    $ symfony new learn-symfony
```
2. Dependency Injection: factories http://symfony.com/doc/current/components/dependency_injection/factories.html
3. Bundles: Overriding default error pages http://symfony.com/doc/current/cookbook/controller/error_pages.html
4. Controllers: The request http://symfony.com/doc/current/book/controller.html#requests-controller-response-lifecycle
5. Controllers: The response http://symfony.com/doc/current/book/controller.html#the-request-and-response-object
6. Automated Tests: Request and response objects introspection http://symfony.com/doc/current/book/testing.html. Examples came with #4 and #5 (see above).
7. Templating with Twig: Controller rendering. Render template without controller http://symfony.com/doc/current/cookbook/templating/render_without_controller.html.
8. Security: Firewalls. http://symfony.com/doc/current/components/security/firewall.html
9. Security: Guard authenticators http://symfony.com/doc/current/cookbook/security/guard-authentication.html
10. Automated Tests: Profile object http://symfony.com/doc/current/cookbook/testing/profiling.html
11. Forms: Forms creation http://symfony.com/doc/current/book/forms.html
12. Automated Tests: Framework objects access http://symfony.com/doc/current/book/testing.html#accessing-internal-objects
13. Templating with Twig: Template includes http://symfony.com/doc/current/book/templating.html#including-templates
