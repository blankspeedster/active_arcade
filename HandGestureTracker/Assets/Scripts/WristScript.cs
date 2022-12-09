using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;
using UnityEngine.SceneManagement;

public class WristScript : MonoBehaviour
{

    public TMP_Text userName, timer, scoreText;
    float timeRemaining;
    public GameObject timeUpPanel;

    // Start is called before the first frame update
    void Start()
    {
        timeUpPanel.SetActive(false);
        string username = PlayerPrefs.GetString("username");
        userName.text = username;
        PlayerPrefs.SetInt("wristScore", 0);

        int _ItimeRemaining = PlayerPrefs.GetInt("globalTimer");
        timeRemaining = (float)_ItimeRemaining;
    }

    // Update is called once per frame
    void Update()
    {
        if (timeRemaining > 0)
        {
            timeRemaining -= Time.deltaTime;
            string _timeRemaining = timeRemaining.ToString("n2");
            timer.text = "Time: " + _timeRemaining;
        }
        else
        {
            timer.text = "Time: 0";
            timeUpPanel.SetActive(true);
        }

        int score = PlayerPrefs.GetInt("wristScore");
        string _score = "Score: "+ score.ToString();
        scoreText.text = _score;
    }

    //Go to Main Menu
    public void goToMainMenu()
    {
        SceneManager.LoadScene("MainMenuScene");
    }
}
