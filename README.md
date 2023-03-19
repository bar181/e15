# Project 2
+ By: Bradley Ross
+ Production URL: e15p2.bradross.me

## Outside resources
+ [tailwind css - framework](https://tailwindcss.com/)
+ [midjourney - image creation](https://www.midjourney.com/app/)
+ [tailwind cards css](https://v1.tailwindcss.com/components/cards)
+ [tailwind form css](https://v1.tailwindcss.com/components/forms)
+ [retain form content for text area - Laracasts forum](https://laracasts.com/discuss/channels/general-discussion/laravel-old-input-messing-with-bootstrap-textarea)


## Notes for instructor
+ images within this document were generated using midjourney (AI Art), prompts by Bradley Ross


## requirements checklist
+ Unique inputs: 4 (text, text area, radio, checkbox)
+ Laravel form validation: PageController::create for 4 input fields using $request->validate for 4 required fields plus a min length for title
+ No Javascript validation
+ Form failure notification: provides comment on error and retains all form content
+ Template inheritance: Layout: layouts/main, Child: welcome
+ Controllers: 1 (PageController)