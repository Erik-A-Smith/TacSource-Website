===============================
                                  New Event
===============================
**Title**: {{$event->name}}
**By**: *{{$event->Owner->username}}*
**At**: {{$event->time}} in {{$event->zone}}
**Link**: {{$baseUrl}}/event/{{$event->id}}


{{$event->description}}
