<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\User;


class OpenAIService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('OPENAI_API_KEY');
    }

    public function generateText($prompt ,$maxTokens = 200)
    {     
        $estructura = 'Aprendete mi estructura “Guion tsunami” para hacer reels ganadores: (Paso 1) La estructura para un guión ganador es: 1. Hook o Gancho 2. Hype 3. CTA light 4. Contenido 5. Conclusión 6. CTA heavy y te explicaré en que consiste cada uno: 1) Hook o gancho La primera oración de tu video. No debe durar más de 4 segundos para captar la atención de la audiencia. Debe ser extremadamente llamativa. Asegúrate de levantar cualquier tipo de reacción emocional en la audiencia. Lo ideal es que sea una frase negativa o muy poderosa. Ejemplo: 1. Te voy a dar (cantidad) de consejos/hacks/ trucos infravalorados para (insertar resultado deseado) 2. Imagina si pudieras (insertar resultado deseado) 3. Por esto tu (acción) no está funcionando 4. Nadie está hablando de (x) 5. Este pendejo error te puede estar costando (insertar cosa valiosa) 6. Te voy a revelar mi secreto para (insertar resultado deseado) 7. ¿Cómo (insertar resultado deseado) en (insertar plazo corto de tiempo)? 8. Me iba a llevar esto a la tumba pero decidí contartelo 9. (insertar porcentaje loco) de ustedes han (insertar acción negativa) 10. Te voy a decir la manera en la que vas a asegurar tu (resultado no deseado) 11. Esta es tu señal para (insertar pensamiento que todos tienen pero nadie dice) 12. Hablemos de (tema que nadie conoce), la estrategia que (insertar figura de autoridad en tu nicho) usó para (insertar resultado deseado) 13. Estarías dispuesto a (acción loca) para conseguir (resultado deseado) 14. Si yo te pudiera resumir cómo (resultado super deseado) en (plazo corto de tiempo) es… 15. Hay una parte oscura de (resultado deseado) de la cual nadie te va a hablar 16. Estos 3 (hábitos, libros, creencias) cambiaron por siempre mi (tema con el que tu nicho batalle) 17. Intenté cada (soluciones que tu nicho ya intentó) y esto es todo lo que tienes que saber 18. Si no estás (consiguiendo resultado deseado) es porque no (solución de la que nadie había escuchado) 19. Se ha hablado mucho de (creencia común), ahora hablemos de (romper creencia) 20. Te presento (concepto nuevo) el plan/reto/protocolo para cambiar tu vida en (cantidad relativamente corta de tiempo) 2) Hype El punto crucial en el que la persona decide si quiere seguir viendo el video o no, es lo que potencia al gancho para que la persona perciba que recibirá gran valor en el video. Por ahora, encontramos 7 Maneras de darle hype al video: 1. Hype1 A mi me costó a ti NO: Se usa básicamente para hacerle saber a la persona que tiene todo para ganar si se queda viendo el video, dándole una percepción de valor muy alta. Por ejemplo: 1. La gente PAGA por esta información, pero te la daré gratis. 2. Miles de emprendedores pagan 10000 dolares por esta informacion pero yo te la regalaré 3. A mi me costó 5 años aprenderlo pero tu podrás aplicarlo en menos de 10 segundos 2. Hype 2 Respaldo de Autoridad: Aquí utilizamos la autoridad de una figura reconocida del nicho. Por ejemplo: 1. Esto fue lo que Alex Hormozi hizo para generar 1M$. 2. Brando Angulo siguió este consejo y hoy tiene edificios de 300 millones 3. Rusell Brunson genera miles de dolares con esta estrategia 3. Hype 3 Refuta la Autoridad: Refuta la opinión de alguien que tenga autoridad en tu nicho. O bien, refuta una creencia popular en tu nicho. Por ejemplo: 1. Todo lo que dicen de eliminar los carbohidratos ha estado mal desde el día 1. 2. Todos los cursos de internet han estado mal desde el dia 1 3. robert kiyosaki no tomó esto en cuenta 4. ni los mejores expertos en ventas tomaron esto en cuenta 4. Historia personal: Esta es una muy utilizada, donde haces saber a las personas que ya viviste lo que estás hablando, eso te hace ver como alguien con experiencia. Por ejemplo: 1. Yo hubiera PAGADO por saber esto antes. 2. empresarios pagan 10k usd por saber esto y hoy te lo voy a regalar 3. a mi me tomó 10 años pero a ti te lo diré en 1 minuto 4. no tendrás que leer libros aburridos, te lo voy a resumir en 30 segundos 5. este reel te va a enseñar mas que un mastermind de 20k usd 5. Asunción Negativa: Aquí el punto es bajar la guardia de la audiencia diciendo algo negativo de lo que ya la gente está cansada de escuchar. Que sientan que tú eres distinto al resto. Por ejemplo: 1. Y no.. no estoy intentando venderte un curso para hacer dinero 2. y no NO se trata de uno de esos cursos que solo te venden humo 3. y no, no tienes que levantarte a las 5am para lograr esto 6. Calentamiento: Anticipa a la audiencia todo el valor que estás a punto de entregarle. Literalmente enciende el video, estando totalmente seguro de que les cambiará la vida si se quedan viendo. Por ejemplo: 1. No te imaginas qué tan sencillo es, te lo voy a explicar en menos de 1 minuto. 2. es tan facil que un mesero con las estrategias correctas lo pudo lograr 3. no deberias tardar mas de 30 segundos en ejecutar esto 7. Crudo: Este le llamamos así porque la idea es decir algo que la gente no quiere escuchar. Este estilo es el que mayormente genera hate, pero ese hate te impulsa la interacción. Por ejemplo: 1. No seas tonto, escuchar esto es todo lo que tienes que hacer 2. nunca vas a ser rico, es duro pero es la realidad 3) CTA light El CTA es el llamado a la acción, invitar a la audiencia a interactuar con tu video/contenido. En este caso, el CTA light son todos los que no intervienen con la experiencia de ver el video, es decir: a) Dale like a este video para que el algoritmo se encargue de hacerte rico b) Sigueme para ver contenido que te haga hacer dinero c) Guarda este video para mostrarselo a tu socio 4) Contenido Aquí es donde, das la información que romperá creencias y aportarás todo el valor posible. 5) Conclusión Aquí es donde cierras la idea. Debes asegurarte de dejar satisfecha a la audiencia con el valor que aportes para que quieran seguir viendo tu contenido. 6) CTA Heavy Son todos aquellos llamados a la acción que requieren que la audiencia haga un poco más de “esfuerzo” como comentar, compartir en su historia, etiquetar a su amigo o guardar en favoritos. Por eso se suele dejar a lo último del video. Por ejemplo: 1. Comenta tu emoji favorito si quieres que suba más vídeos de este tipo 2. Comenta un fueguito para que el algoritmo te recomiende mas videos chingones y se encargue de hacerte rico 3. comenta la palabra “info” y te digo como podría ayudarte a lograr lo mismo.';

        try {
        $response = $this->client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type'  => 'application/json',                
            ],
            'json' => [
                'model' => 'gpt-3.5-turbo',  // o gpt-4 si tienes acceso  gpt-3.5-turbo
                'messages' => [
                    ['role' => 'system', 'content' => $estructura],
                    ['role' => 'user', 'content' => 'Creame 1 reel con la estructura guion tsunami donde hables de '. $prompt],
                ],                               
            ]
        ]);
        
        $body = json_decode($response->getBody(), true); 
        
        return $body['choices'][0]['message']['content'] ?? 'No response';
        } catch (\Exception $e) {
            // Maneja el error o registra la excepción
            return 'Error: ' . $e->getMessage();
        }
    }
}